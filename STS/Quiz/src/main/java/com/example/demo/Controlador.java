package com.example.demo;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import jakarta.servlet.http.HttpSession;

@Controller
public class Controlador {
	
	@Autowired
	private RepositorioUsuario repositorioUsuario;
	
	Usuario usuario = new Usuario();
	public  void sumarPuntos(Integer x) {
		int g = usuario.getPuntuacion();
		g+=x;
		usuario.setPuntuacion(g);
	}

	@GetMapping("/")
	public String InicioQuiz() {
		return "inicio";
	}
	
	@PostMapping("/pregunta1")
	public String procesoNombre(HttpSession session,String nombre) {
		usuario.setNombre(nombre);
		usuario.setPuntuacion(0);
		session.setAttribute("usuario",usuario);
		
		if(usuario.getNombre().isEmpty()) {
			return"redirect:/";
		}
		
		return"pregunta1";
	}
	
	@PostMapping("/pregunta2")
	public String procesoPregunta2(HttpSession session,Integer puntos) {
		sumarPuntos(puntos);
		return"pregunta2";
	}
	
	@PostMapping("/pregunta3")
	public String procesoPregunta3(HttpSession session , Integer puntos) {
		sumarPuntos(puntos);
		return"pregunta3";
	}
	
	@PostMapping("/pregunta4")
	public String procesoPregunta4(HttpSession session ,Integer puntos) {
		sumarPuntos(puntos);
		return"pregunta4";
	}
	@PostMapping("/pregunta5")
	public String procesoPregunta5(HttpSession session ,Integer puntos) {
		sumarPuntos(puntos);
		return"pregunta5";
	}
	
	@PostMapping("/pregunta6")
	public String proecesoPregunta6(HttpSession session, Integer puntos) {
		sumarPuntos(puntos);
		return"pregunta6";
		}
	
	@PostMapping("pregunta7")
	public String procesoPregunta7(HttpSession session ,Integer puntos) {
		sumarPuntos(puntos);
		return"pregunta7";
	}
	
	@PostMapping("resultado")
	public String resulado(HttpSession session ,Integer puntos) {
		sumarPuntos(puntos);
		usuario.getNombre();
		
		int a =usuario.getPuntuacion();
		 if (a<= 5) {
	            usuario.setLenguaje("HTML/CSS: ideal para la creación de estructuras y estilos en sitios web." ) ;
	        } else if (a<= 8) {
	             usuario.setLenguaje("JavaScript: dinámico y flexible para desarrollo web.");
	        } else if (a<= 12) {
	            usuario.setLenguaje("PHP: perfecto para la conexión con bases de datos y desarrollo web.") ;
	        } else if (a<= 16) {
	            usuario.setLenguaje("Java: robusto y excelente para aplicaciones concurrentes.") ;
	        } else if (a<= 20) {
	            usuario.setLenguaje("C#: versátil y excelente para aplicaciones de escritorio y videojuegos.") ;
	        } else {
	            usuario.setLenguaje("Python: ideal para análisis de datos, automatización e inteligencia artificial.");
	        }
		
		return "resultado";
	}
	
	@PostMapping("guardarDatos")
	public String guardarDatos(HttpSession session,String comentario) {
		usuario.setComentario(comentario);
		repositorioUsuario.save(usuario);
	    session.removeAttribute("usuario");

		
		
		return"redirect:/";
	}
	
	
}
