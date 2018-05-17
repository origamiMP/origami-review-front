#!/bin/bash

cd docker_origami_review_front
docker-compose exec --user 1000 workspace bash
cd ..
