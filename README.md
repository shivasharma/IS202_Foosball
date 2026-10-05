# IS436-Classwork-Foosball
IS436 Classwork Foosball Project

# Docker command to create mysql database

docker run --name mysql-container -e MYSQL_ROOT_PASSWORD=rootpassword -e MYSQL_DATABASE=mydatabase -e MYSQL_USER=myuser -e MYSQL_PASSWORD=mypassword -p 3306:3306 -d mysql:latest
| Option / Argument | Description |
|--------------------|-------------|
| `--name mysql-container` | Names the container **mysql-container** |
| `-e MYSQL_ROOT_PASSWORD=rootpassword` | Sets the **root password** for MySQL |
| `-e MYSQL_DATABASE=mydatabase` | Creates a **database** named `mydatabase` |
| `-e MYSQL_USER=myuser` | Creates a **user** named `myuser` |
| `-e MYSQL_PASSWORD=mypassword` | Sets the **password** for `myuser` |
| `-p 3306:3306` | Maps **port 3306** of the container to **port 3306** on the host |
| `-d` | Runs the container in **detached mode** |
| `mysql:latest` | Uses the **latest MySQL image** from Docker Hub |



# 🐳 Docker Command Reference

A comprehensive guide and quick reference for essential Docker commands — covering Images, Containers, Volumes, and Networks.

---

## 📘 Quick Command Cheat Sheet

| Category | Description | Command |
|-----------|--------------|----------|
| 🧱 Images | List all local images | `docker images` |
|  | Delete an image | `docker rmi <image_name>` |
|  | Remove unused images | `docker image prune` |
|  | Build image from Dockerfile | `docker build -t <image_name>:<version> .` |
| 📦 Containers | List all containers | `docker ps -a` |
|  | List running containers | `docker ps` |
|  | Run container | `docker run <image_name>` |
|  | Run in background | `docker run -d <image_name>` |
|  | Custom container name | `docker run --name <name> <image>` |
|  | Port mapping | `docker run -p <host>:<container> <image>` |
|  | Set env vars | `docker run -e <var>=<value> <image>` |
|  | Start/Stop container | `docker start|stop <container>` |
|  | Remove container | `docker rm <container>` |
| 🧰 Troubleshoot | View logs | `docker logs <container>` |
|  | Shell inside container | `docker exec -it <container> /bin/bash` |
| ☁️ DockerHub | Pull image | `docker pull <image>` |
|  | Push image | `docker push <username>/<image>` |
|  | Login | `docker login -u <username>` |
|  | Search image | `docker search <image>` |
| 💾 Volumes | List volumes | `docker volume ls` |
|  | Create volume | `docker volume create <name>` |
|  | Delete volume | `docker volume rm <name>` |
|  | Mount named volume | `docker run --volume <vol>:<path> <image>` |
|  | Bind mount | `docker run --volume <host>:<container> <image>` |
| 🌐 Networks | List networks | `docker network ls` |
|  | Create network | `docker network create <name>` |
|  | Delete network | `docker network rm <name>` |
|  | Prune unused networks | `docker network prune` |

---

🗑️ Delete an Image
docker rmi <image_name>
# Example:
docker rmi nginx

🧹 Remove Unused Images
docker image prune

🏗️ Build an Image from a Dockerfile
# Basic build (version is optional)
docker build -t <image_name>:<version> .

# Example:
docker build -t myapp:1.0 .

# Build without cache
docker build -t <image_name>:<version> . --no-cache

📦 CONTAINERS
📋 List All Local Containers (Running & Stopped)
docker ps -a

▶️ List Only Running Containers
docker ps

🚀 Create & Run a New Container
docker run <image_name>
# Example:
docker run nginx

⚙️ Run Container in Background (Detached Mode)
docker run -d <image_name>
# Example:
docker run -d nginx

🏷️ Run Container with Custom Name
docker run --name <container_name> <image_name>
# Example:
docker run --name mynginx nginx

🔌 Port Binding (Host ↔ Container)
docker run -p <host_port>:<container_port> <image_name>
# Example:
docker run -p 8080:80 nginx

🌍 Set Environment Variables in a Container
docker run -e <var_name>=<var_value> <image_name>
# Example:
docker run -e ENV=production nginx

⏯️ Start or Stop an Existing Container
docker start <container_name>
docker stop <container_name>
# Example:
docker start mynginx
docker stop mynginx

🔎 Inspect a Container
docker inspect <container_name>

🗑️ Delete a Container
docker rm <container_name>

🧰 TROUBLESHOOTING
📜 Fetch Logs of a Container
docker logs <container_name>
# Example:
docker logs mynginx

🖥️ Open Shell Inside a Running Container
docker exec -it <container_name> /bin/bash
# or (for Alpine-based images)
docker exec -it <container_name> sh

☁️ DOCKER HUB
📥 Pull an Image from DockerHub
docker pull <image_name>
# Example:
docker pull ubuntu

📤 Push an Image to DockerHub
docker push <username>/<image_name>
# Example:
docker push myuser/myapp:1.0

🔐 Login / Logout to DockerHub
docker login -u <username>
# Example:
docker login -u mydockeruser

# Logout
docker logout

🔎 Search for an Image on DockerHub
docker search <image_name>
# Example:
docker search redis

💾 VOLUMES
📋 List All Volumes
docker volume ls

➕ Create New Named Volume
docker volume create <volume_name>
# Example:
docker volume create mydata

🗑️ Delete a Named Volume
docker volume rm <volume_name>

📦 Mount Named Volume in a Container
docker run --volume <volume_name>:<mount_path> <image_name>
# Example:
docker run --volume mydata:/data nginx

Or Using --mount:
docker run --mount type=volume,src=<volume_name>,dst=<mount_path> <image_name>

🧭 Mount Anonymous Volume
docker run --volume <mount_path> <image_name>
# Example:
docker run --volume /data nginx

🔗 Create a Bind Mount
docker run --volume <host_path>:<container_path> <image_name>
# Example:
docker run --volume /home/user/app:/usr/share/nginx/html nginx

Or Using --mount:
docker run --mount type=bind,src=<host_path>,dst=<container_path> <image_name>

🧹 Remove Unused Local Volumes
docker volume prune

🌐 NETWORK
📋 List All Networks
docker network ls

➕ Create a New Network
docker network create <network_name>
# Example:
docker network create mynetwork

🗑️ Remove a Network
docker network rm <network_name>

🧹 Remove All Unused Networks
docker network prune
