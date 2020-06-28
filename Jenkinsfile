pipeline{
    
    agent any

    stages{
        stage("Docker Building"){
            echo "Build Docker File for TrocTaCarotte"
            // Build image
            def carotte_img = docker.build("carotte:latest")
        }
    }
}