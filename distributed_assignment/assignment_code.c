#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <windows.h> 

#define PASSWORD "distributed123" // password for security measure
#define LIGHT_THRESHOLD_LOW 400
#define LIGHT_THRESHOLD_HIGH 900
#define DESIRED_TEMP_MIN 20
#define DESIRED_TEMP_MAX 25

// structure to hold sensor data
typedef struct {
    int light;
    float temperature;
    float humidity;
} SensorData;

// function prototypes
void read_sensor_data(SensorData *data);
void adjust_light(int light_level);
void adjust_temperature(float temperature);
void send_actuator_command(int actuator_id, int command);
bool authenticate();
void security_check();

int main() {

    security_check();

    while (true) {

        // read sensor data from each corner as i have 4 in my design
        SensorData sensor1, sensor2, sensor3, sensor4;
        read_sensor_data(&sensor1);
        read_sensor_data(&sensor2);
        read_sensor_data(&sensor3);
        read_sensor_data(&sensor4);

        // calculate average readings for light and temperature
        int avg_light = (sensor1.light + sensor2.light + sensor3.light + sensor4.light) / 4;
        float avg_temp = (sensor1.temperature + sensor2.temperature + sensor3.temperature + sensor4.temperature) / 4;

        // adjust light and temperature based on average readings
        adjust_light(avg_light);
        adjust_temperature(avg_temp);

        // simulate some delay between readings
        Sleep(2000); 
    }

    return 0;
}

// function to read sensor data
void read_sensor_data(SensorData *data) {
    // simulated sensor readings
    data->light = rand() % 1000;
    data->temperature = ((float)(rand() % 160) / 10) + 15; // simulated temperature range: 15-30 degrees
    data->humidity = (float)(rand() % 100) / 10;

    // print sensor data 
    printf("Sensor data - Light: %d, Temperature: %.2f C, Humidity: %.2f%%\n", data->light, data->temperature, data->humidity);
}

// function to adjust light based on sensor reading
void adjust_light(int light_level) {
    if (light_level < LIGHT_THRESHOLD_LOW) {
        // if light intensity is too low, turn on lights
        send_actuator_command(1, 1); // turn on lights
        printf("Light turned on. Light intensity is too low.\n");
    } else if (light_level > LIGHT_THRESHOLD_HIGH) {
        // if light intensity is too high, turn off lights
        send_actuator_command(1, 0); // turn off lights
        printf("Light turned off. Light intensity is too high.\n");
    } else {
        printf("No action taken. Light intensity within optimal range.\n");
    }
}

// function to adjust temperature based on sensor reading
void adjust_temperature(float temperature) {
    if (temperature < DESIRED_TEMP_MIN) {
        // if temperature is too low, turn on heater
        send_actuator_command(2, 1); // turn on heater
        printf("Heater turned on. Temperature is too low.\n");
    } else if (temperature > DESIRED_TEMP_MAX) {
        // if temperature is too high, turn on cooler
        send_actuator_command(2, 0); // turn off heater and turn on cooler
        printf("Cooler turned on. Temperature is too high.\n");
    }
}

// Function to send commands to actuator nodes 
void send_actuator_command(int actuator_id, int command) {
    // Simulated actuator command
    printf("Actuator command - ID: %d, Command: %d\n", actuator_id, command);
}

// Function to authenticate user with password
bool authenticate() {
    char input[20];
    printf("Enter password: ");
    scanf("%s", input);
    if (strcmp(input, PASSWORD) == 0) {
        return true;
    } else {
        printf("Incorrect password!\n");
        return false;
    }
}

// function for security check
void security_check() {
    printf("Welcome to the office automation system!\n");
    printf("Please authenticate to proceed.\n");
    while (!authenticate()) {}
    printf("Authentication successful. System ready.\n");
}

