# TLS Tester

This repository created for practical training on TLS security.
Available as a [Docker-compose](https://docs.docker.com/compose/).

## Quick Start
1. Clone this repository.
2. Build containers with `docker-compose`.
3. Attach bash to "https" container and finish setting up SSL.
    ```bash
    docker exec -it https /bin/bash

    # Inside of "https" container
    /ssl_config.sh

    # Answer a few questions about the certificate and complete the process.
    # After answering the questions, the container will be automatically exit.

    # Outside of "https" container
    docker start https
    ```

## Connect to HTTP & HTTPS server
The protocol selects which server to connect to.
* HTTP : http://localhost
* HTTPS : https://localhost