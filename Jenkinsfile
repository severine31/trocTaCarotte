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
        
    }
}