package com.example.guia2;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class SaludoController {


    @GetMapping("/saludo")
    public String FormularioSaludo(Model model){
        model.addAttribute("saludo",new Saludo());
        return "saludo";
    }

    @PostMapping("/saludo")
    public String SaludoSubmit(@ModelAttribute Saludo saludo, Model model){
        model.addAttribute("saludo", saludo);
        return "resultado";
    }

}
