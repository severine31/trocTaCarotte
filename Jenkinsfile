pipeline{
    
    agent any

    stages{
        stage("Docker Building"){
            steps{
                echo "Build Docker File for TrocTaCarotte"
                def customImage = docker.build("carotte:latest")
            }
        }
    }
}