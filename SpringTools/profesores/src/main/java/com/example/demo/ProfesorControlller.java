package com.example.demo;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class ProfesorControlller {

	@Autowired
	private RepositorioProfesor repositorioProfesor;
		@GetMapping("/")
		public String nuevoProfesor() {
			
			
			Profesor javi = new Profesor();
			javi.setNombre("javier Puche");
			javi.addEmail(new Email("javier@dasd.com"));
			javi.addEmail(new Email("jaierPuche"));
			
			Profesor pedro = new Profesor();
			pedro.setNombre("Pedro ejej");
			pedro.addEmail(new Email("pedro@dsds.com"));
			
			Profesor noe = new Profesor();
			noe.setNombre("Noe");
			noe.addEmail(new Email("noe.com"));
			noe.addEmail(new Email("noe2@dads"));
			
			
			repositorioProfesor.save(pedro);
			repositorioProfesor.save(javi);
			repositorioProfesor.save(noe);
			
			
			return"redirect:/datos";
			
		}
		
		
		@GetMapping("/datos")
		public String mostrarProfesores(Model model) {
		model.addAttribute("profesores",repositorioProfesor.findAll());
			///profesor es el nombe que usa la plantilla para usar los datos de la base de datos 
				
			return "datos";
		}
		
		
}
