pipeline{
    
    agent any

    stages{
        stage("Docker Building"){
            steps{
                echo "Build Docker File for TrocTaCarotte"
                // Vuild image
                def carotte_img = docker.build("carotte:latest")
            }
        }
    }
}