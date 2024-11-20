package com.example.demo;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@SpringBootApplication
@RestController
public class KasApplication {
    public static void main(String[] args) {
      SpringApplication.run(KasApplication.class, args);
    }
    @PostMapping("/hola")
    public String hello(@RequestParam(value = "nombre", defaultValue = "World") String name) {
      return String.format("HOLA %s!", name);

    }
}