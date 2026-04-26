package services;

import java.util.ArrayList;

import entity.Tache;

public final class TacheService {
     private static ArrayList<Tache> taches = new ArrayList<>();
     private TacheService() {
     }

        public static void addTache(Tache tache) {
            taches.add(tache);  
        }

        

}
