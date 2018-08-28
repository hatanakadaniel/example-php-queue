package br.com.hatanaka;

import org.springframework.amqp.rabbit.annotation.RabbitHandler;
import org.springframework.amqp.rabbit.annotation.RabbitListener;
import org.springframework.messaging.handler.annotation.Payload;

@RabbitListener(queues = {"hello"})
public class Consumer {

  @RabbitHandler
  public void receiveMessage(@Payload byte[] message) {
    System.out.println(new String(message));
  }
}
