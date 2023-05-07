<p align="center"><img src="https://raw.githubusercontent.com/AhmedHdeawy/laravel-logs-ELK/main/laravel-app/public/laravel-elk.jpg"  alt="Laravel ELK Stack"></p>

## Sending Laravel logs to ELK

This repository contains a Docker setup for a Laravel application and Elk stack, reads the laravel logs bu filebeat and sends them to a Logstash container running in another Docker Compose stack. and finally you can see the logs in Kibana

## Idea

 The Laravel application will log to the `storage\logs` directory. Filebeat will read the logs and send them to Logstash running in another Docker Compose stack, where you can then configure it to do whatever you want with the logs. these logs from Logstash will save in Elastic, and finally Kibana will read the logs and visualize them


## Prerequisites

- Docker
- Docker Compose

## Setup

1. Clone this repository:

```
git clone https://github.com/AhmedHdeawy/laravel-logs-ELK.git

cd laravel-logs-ELK
```

2. Start Laravel App Docker Compose with the following commands:

```
cd laravel-app
```
```
sail up
```

2. Start ELK Stach Docker Compose with the following commands:

```
cd elk
```
```
docker-compose up
```

## Usage

Once the Docker Compose stacks are running, just open the `routes/web.php` file and  the code like the following

```

Route::get('/', function () {

    for ($i=0; $i < 15; $i++) { 
        Log::info("TEST Logs" . $i + 1 , [
            'stack' => 'ELK #' . $i,
            'consumer' => 'filebeat'
        ]);
    }
    
    return view('welcome');
});

```

- Kibana Configuration

open your browser to access Kibana dashboard through `http://localhost:5601`

Go to `Stack Management` => `Index patterns` => `Create index pattern`

Write the name `laravel-*` and choose `timestamp` from Timestamp field dropdown

Finally, from Kibana navigation panel, choose `Discover` and then select our Index `laravel-*`.

Congratulations, now you can see your logs and search for your logs

## License

This code is released under the MIT License.
