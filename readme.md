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
Document Length:        25 bytes

Concurrency Level:      30
Time taken for tests:   584.653 seconds
Complete requests:      100000
Failed requests:        0
Keep-Alive requests:    0
Total transferred:      18000000 bytes
HTML transferred:       2500000 bytes
Requests per second:    171.04 [#/sec] (mean)
Time per request:       175.396 [ms] (mean)
Time per request:       5.847 [ms] (mean, across all concurrent requests)
Transfer rate:          30.07 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.1      0      95
Processing:    12  175  76.9    167    1282
Waiting:       10  175  76.9    167    1282
Total:         12  175  76.9    168    1282

Percentage of the requests served within a certain time (ms)
  50%    168
  66%    176
  75%    183
  80%    187
  90%    202
  95%    218
  98%    241
  99%    269
 100%   1282 (longest request)
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
Time taken for tests:   489.855 seconds
Complete requests:      100000
Failed requests:        0
Keep-Alive requests:    0
Total transferred:      19400000 bytes
Total body sent:        19700000
HTML transferred:       3900000 bytes
Requests per second:    204.14 [#/sec] (mean)
Time per request:       146.956 [ms] (mean)
Time per request:       4.899 [ms] (mean, across all concurrent requests)
Transfer rate:          38.68 [Kbytes/sec] received
                        39.27 kb/s sent
                        77.95 kb/s total

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.1      0     134
Processing:    11  147  50.7    143    1325
Waiting:        9  146  50.7    143    1325
Total:         11  147  50.6    143    1326

Percentage of the requests served within a certain time (ms)
  50%    143
  66%    152
  75%    158
  80%    162
  90%    178
  95%    204
  98%    238
  99%    257
 100%   1326 (longest request)

```