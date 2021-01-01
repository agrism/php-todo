# Pre work

### 1. Init db
```bash
curl --request GET http://127.0.0.1:8081/init-database
```


# Benchmarks

### 1. Read test

```bash
ab -n 100000 -k -c 30 -q http://127.0.0.1:8081/todos/1
```

### 1.1. Result:

```bash
This is ApacheBench, Version 2.3 <$Revision: 1879490 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient).....done


Server Software:        nginx/1.19.6
Server Hostname:        127.0.0.1
Server Port:            8081

Document Path:          /todos/1
Document Length:        34 bytes

Concurrency Level:      30
Time taken for tests:   469.531 seconds
Complete requests:      100000
Failed requests:        0
Keep-Alive requests:    0
Total transferred:      18900000 bytes
HTML transferred:       3400000 bytes
Requests per second:    212.98 [#/sec] (mean)
Time per request:       140.859 [ms] (mean)
Time per request:       4.695 [ms] (mean, across all concurrent requests)
Transfer rate:          39.31 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.6      0     197
Processing:    12  140  43.3    137    1247
Waiting:       10  140  43.2    137    1247
Total:         12  141  43.1    137    1247

Percentage of the requests served within a certain time (ms)
  50%    137
  66%    145
  75%    151
  80%    155
  90%    170
  95%    194
  98%    225
  99%    242
 100%   1247 (longest request)

```

### 2. Write test

```bash
ab -p benchmark-post.json -T application/json -n 100000 -k -c 30 -q http://127.0.0.1:8081/todos
```

### 2.1. Result:

```bash
This is ApacheBench, Version 2.3 <$Revision: 1879490 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient).....done


Server Software:        nginx/1.19.6
Server Hostname:        127.0.0.1
Server Port:            8081

Document Path:          /todos
Document Length:        39 bytes

Concurrency Level:      30
Time taken for tests:   500.543 seconds
Complete requests:      100000
Failed requests:        0
Keep-Alive requests:    0
Total transferred:      19400000 bytes
Total body sent:        19700000
HTML transferred:       3900000 bytes
Requests per second:    199.78 [#/sec] (mean)
Time per request:       150.163 [ms] (mean)
Time per request:       5.005 [ms] (mean, across all concurrent requests)
Transfer rate:          37.85 [Kbytes/sec] received
                        38.43 kb/s sent
                        76.28 kb/s total

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.1      0     111
Processing:    14  150  53.4    145    1231
Waiting:       12  150  53.3    145    1231
Total:         14  150  53.3    145    1231

Percentage of the requests served within a certain time (ms)
  50%    145
  66%    153
  75%    160
  80%    164
  90%    180
  95%    201
  98%    230
  99%    250
 100%   1231 (longest request)
```