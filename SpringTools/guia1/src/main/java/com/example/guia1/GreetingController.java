package com.example.guia1;

//1 AÑADIMOS EL CONTROLADOR

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller 
public class GreetingController {
    
    @GetMapping("/saludo")//para que podamos capturar los datos usando la url del puerto 8080

    public String greeting(
        //queremos capturar un nombre (no obligatorio) 
        @RequestParam (name = "nombre",required=false ,defaultValue="mundo")
        //capturamos  el nombre y el modelo en el que se van a usar 
        String name , Model model
        ){
            //pasamos los datos al modelo
            model.addAttribute("nombre",name);
            return "saludo";
        }
}
