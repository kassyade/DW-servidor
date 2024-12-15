package quiz.id.quiz;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.SessionAttributes;

@Controller
@SessionAttributes("usuario")
public class Controlador {

    @ModelAttribute("usuario")
    public Usuario usuario() {
        return new Usuario();
    }

    @GetMapping("/inicio")
    public String inicio() {
        return "inicio";
    }

    @PostMapping("/pregunta1")
    public String procesarPregunta1(@ModelAttribute Usuario usuario) {
        return "pregunta1";
    }

    @PostMapping("/pregunta2")
    public String procesarPregunta2(@ModelAttribute Usuario usuario, @RequestParam("respuesta") int respuesta) {
        usuario.agregarPuntuacion(respuesta);
        return "pregunta2";
    }

    @PostMapping("/pregunta3")
    public String procesarPregunta3(@ModelAttribute Usuario usuario, @RequestParam("respuesta") int respuesta) {
        usuario.agregarPuntuacion(respuesta);
        return "pregunta3";
    }

    @PostMapping("/resultado")
    public String resultado(@ModelAttribute Usuario usuario, @RequestParam("respuesta") int respuesta, Model model) {
        usuario.agregarPuntuacion(respuesta);

        String lenguaje = calcularLenguaje(usuario.getPuntuacionTotal());
        model.addAttribute("lenguaje", lenguaje);

        return "resultado";
    }

    private String calcularLenguaje(int puntuacionTotal) {
        if (puntuacionTotal <= 4) {
            return "JavaScript: dinámico y flexible para desarrollo web.";
        } else if (puntuacionTotal <= 8) {
            return "PHP: perfecto para la conexión con bases de datos y desarrollo web.";
        } else if (puntuacionTotal <= 12) {
            return "Java: robusto y excelente para aplicaciones concurrentes.";
        } else {
            return "Python: ideal para análisis de datos y automatización.";
        }
    }
}
