package datos.id.base_datos;


import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;

@SpringBootApplication
public class BaseDatosApplication {

  private static final Logger log = LoggerFactory.getLogger(BaseDatosApplication.class);

  public static void main(String[] args) {
    SpringApplication.run(BaseDatosApplication.class);
  }

  @Bean
  public CommandLineRunner demo(RepositorioCliente repository) {
    return (args) -> {
      // save a few Clientes
      repository.save(new Cliente("Jack", "Bauer"));
      repository.save(new Cliente("Chloe", "O'Brian"));
      repository.save(new Cliente("Kim", "Bauer"));
      repository.save(new Cliente("David", "Palmer"));
      repository.save(new Cliente("Michelle", "Dessler"));

      // fetch all Clientes
      log.info("Clientes found with findAll():");
      log.info("-------------------------------");
      repository.findAll().forEach(Cliente -> {
        log.info(Cliente.toString());
      });
      log.info("");

      // fetch an individual Cliente by ID
      Cliente Cliente = repository.findById(1L);
      log.info("Cliente found with findById(1L):");
      log.info("--------------------------------");
      log.info(Cliente.toString());
      log.info("");

      // fetch Clientes by last name
      log.info("Cliente found with findByLastName('Bauer'):");
      log.info("--------------------------------------------");
      repository.findByApellido("Bauer").forEach(bauer -> {
        log.info(bauer.toString());
      });
      log.info("");
    };
  }
}
