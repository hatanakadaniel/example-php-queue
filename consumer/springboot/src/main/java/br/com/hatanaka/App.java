package br.com.hatanaka;

import org.springframework.amqp.rabbit.annotation.EnableRabbit;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;

@SpringBootApplication
@EnableRabbit
public class App {

  @Bean
  Consumer consumerRabbit() {
    return new Consumer();
  }

  public static void main(String[] args) {
    SpringApplication.run(App.class, args);
  }
}
