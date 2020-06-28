pipeline{
    
    agent any

    stages{
        stage("Docker Building"){
            steps{
                echo "Build Docker File for TrocTaCarotte"
                docker.build("carotte:latest")
            }
        }
    }
}