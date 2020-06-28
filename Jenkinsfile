pipeline{
    
    agent any

    stages{
        stage("Docker Building"){
            steps {
                echo "Build Docker File for TrocTaCarotte"
                // Build image
                script {
                    docker.build("carotte:latest")
                }   
            }
        }
        stage("Docker-compose Building"){
            steps {
                echo "Starting docker"
                sh('docker-compose donw')
                sh('docker-compose up -d')
            }
        }
    }
}