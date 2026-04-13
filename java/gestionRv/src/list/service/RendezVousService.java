package list.service;

import java.util.ArrayList;

import list.entity.RendezVous;

public class RendezVousService {
    private RendezVousService(){

    }

     private static ArrayList<RendezVous> rendezVous=new ArrayList<RendezVous>();
        public static boolean addRendezVous(RendezVous rv){
           rendezVous.add(rv);
            return true;
        }
    
       
}
