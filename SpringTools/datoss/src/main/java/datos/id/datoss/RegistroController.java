package datos.id.datoss;


import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import jakarta.validation.Valid;

@Controller
public class RegistroController {

    @GetMapping("/registro")
    public String mostrarFormulario(Model model) {
        model.addAttribute("persona", new Persona());
        return "registro";
    }

    @PostMapping("/registro")
    public String procesarFormulario(@Valid Persona persona, BindingResult result, Model model) {
        if (result.hasErrors()) {
            return "registro";
        }

        // Pasar los datos a la vista de confirmación
        model.addAttribute("persona", persona);
        return "datos";
    }
}
