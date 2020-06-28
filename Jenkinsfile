pipeline{
    
    agent any

    stages{
        stage("Docker Building"){
            steps {
                echo "Build Docker File for TrocTaCarotte"
                // Build image
                docker.build("carotte:latest")
            }
        }
    }
}