package list.service;

import java.time.LocalDate;
import java.time.LocalDateTime;
import java.util.ArrayList;

import list.entity.Medecin;
import list.entity.Patient;
import list.entity.RendezVous;

public final class MedecinService {
    private static ArrayList<Medecin>  medecins=new ArrayList<Medecin>();

    private MedecinService(){

    }

    public static  void initialize(){
      Medecin medecin1=new Medecin("Coudy Ly Wane","771001010");
      medecin1.addRendezVous(new RendezVous(LocalDateTime.now().plusDays(1), new Patient("Hamat Baila Wane", "771002020", LocalDate.of(1970, 01, 15))));
      medecin1.addRendezVous(new RendezVous(LocalDateTime.now(), new Patient("Bilel Baila Wane", "771002021", LocalDate.of(1985, 02, 20))));
      Medecin medecin2=new Medecin("Hadi  Wane","771001011");
      medecins.add(medecin1);
      medecins.add(medecin2);

    }
    public static Medecin getMedecinByTel(String tel){
        for (Medecin medecin: medecins) {
               if (medecin.getTelephone().compareTo(tel)==0) {
                  return medecin;
               }
        }
         return null;
    }
}
