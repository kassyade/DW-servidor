package datos.id.base_datos;


import java.util.List;

import org.springframework.data.repository.CrudRepository;

public interface RepositorioCliente extends CrudRepository<Cliente, Long> {

  List<Cliente> findByApellido(String Apellido);

  Cliente findById(long id);
}