package base.datoss.basedatos1;


import java.util.List;

import org.springframework.data.repository.CrudRepository;

public interface RepositorioCliente extends CrudRepository<Cliente, Long> {

  List<Cliente> findByApellido(String Apellido);

  Cliente findById(long id);
}