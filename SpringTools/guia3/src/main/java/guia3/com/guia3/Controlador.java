package guia3.com.guia3;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import jakarta.validation.Valid;




@Controller
public class Controlador  {

    @GetMapping("/")
    public String MostrarFormulario(Model model ) {
        model.addAttribute("Persona",new Persona());
        return "formulario";
    }
    
 /* validamos si el objeto Persona es valido según la clase Persona.java */
 
    @PostMapping("/")
    public String VerificacionPersona(@Valid Persona persona, BindingResult bindingResult, Model model) {
        if (bindingResult.hasErrors()) {
            System.out.println("Errores encontrados: " + bindingResult.getAllErrors());
            return "formulario";
        }
        model.addAttribute("Persona", persona); // Pasamos el objeto al modelo
        return "resultado";
    }
    
    
}
