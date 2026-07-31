pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/ezkappp/technova-inventory.git'
            }
        }

        stage('Build & Start Containers') {
            steps {
                sh 'docker compose up -d --build'
            }
        }

        stage('Prepare Test Database') {
            steps {
                sh 'docker compose exec -T db mysql -u root -prootpassword -e "CREATE DATABASE IF NOT EXISTS technova_inventory_test;"'
            }
        }

        stage('Run Migration') {
            steps {
                sh 'docker compose exec -T app php spark migrate --all'
            }
        }

        stage('Run Tests') {
            steps {
                sh 'docker compose exec -T app vendor/bin/phpunit --no-coverage'
            }
        }
    }

    post {
        success {
            echo 'Pipeline selesai, semua tahap berhasil.'
        }
        failure {
            echo 'Ada tahap yang gagal — lihat log stage di atas.'
        }
    }
}