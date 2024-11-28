package indice.id.indice;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class IndiceController {

    @GetMapping("/")
    public String mostrarFormulario(Model model) {
        model.addAttribute("persona", new Persona());
        return "formulario";
    }

    @PostMapping("/calcular")
    public String calcularIndice(@ModelAttribute Persona persona, Model model) {
        double grasaCorporal;
        if (persona.getGenero().equalsIgnoreCase("masculino")) {
            grasaCorporal = (1.20 * (persona.getPeso() / Math.pow(persona.getAltura() / 100, 2))) +
                            (0.23 * persona.getEdad()) - 16.2;
        } else {
            grasaCorporal = (1.20 * (persona.getPeso() / Math.pow(persona.getAltura() / 100, 2))) +
                            (0.23 * persona.getEdad()) - 5.4;
        }

        String clasificacion;
        if (grasaCorporal < 6) {
            clasificacion = "Esencial";
        } else if (grasaCorporal <= 24) {
            clasificacion = "Deportista";
        } else if (grasaCorporal <= 31) {
            clasificacion = "Fitness";
        } else if (grasaCorporal <= 39) {
            clasificacion = "Aceptable";
        } else {
            clasificacion = "Obesidad";
        }

        model.addAttribute("grasaCorporal", grasaCorporal);
        model.addAttribute("clasificacion", clasificacion);

        return "resultado";
    }
}
