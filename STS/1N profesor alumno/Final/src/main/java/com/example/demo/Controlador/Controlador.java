package com.example.demo.Controlador;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import com.example.demo.Entidades.Alumno;
import com.example.demo.Entidades.Profesor;
import com.example.demo.Servicios.ServicioAlumno;
import com.example.demo.Servicios.ServicioProfesor;

@Controller
public class Controlador {
	
	@Autowired
	ServicioProfesor servicioProfesor;
	@Autowired
	ServicioAlumno servicioAlumno;
	
	
	@GetMapping("/")
	public String inicio(Model model,Profesor profesor,Alumno alumno) {
		model.addAttribute("listaP",servicioProfesor.listaProfesor());
		model.addAttribute("listaA",servicioAlumno.listaAlumno());


		return "inicio";
	}
	
	@PostMapping("/nuevoProfesor")
	public String crearProfesor(Model model,String nombre) {
		Profesor x = new Profesor(nombre);
		
		servicioProfesor.guardarProfesor(x);
		
		return "redirect:/";
	}
	
	@PostMapping("/crearAlumno")
	public String crearAlumno(String nombre,Long profesor) {
		System.out.println(nombre);
		System.out.println(profesor);
		
		Profesor t = servicioProfesor.buscarProfesor(profesor);
		
		Alumno x =new Alumno(nombre,t);
		servicioAlumno.guardarAlumno(x);
		
		return "redirect:/";
	}
	
	@PostMapping("/borrarProfesor") 
	public String borrarProf(Long id){
		System.out.println(id);
		servicioProfesor.borrarProfesor(id);
		return "redirect:/";
	}
	
	
}
