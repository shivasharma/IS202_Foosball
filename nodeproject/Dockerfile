# Use Node 18 Alpine (lightweight)
FROM node:18-alpine

# Set app directory
WORKDIR /usr/src/app

# Copy package files first (for caching)
COPY package*.json ./

# Install dependencies
RUN npm install --production

# Copy all other files
COPY . .

# Expose port 8000


# Start the app
CMD ["node", "index.js"]

