package array.service;

import java.time.LocalDate;
import java.time.LocalDateTime;

import array.entity.Medecin;
import array.entity.Patient;
import array.entity.RendezVous;

public final class MedecinService {
    private static final int N=100;
    private static  Medecin[] medecins=new Medecin[N];
    private static int nbreMedecin;

    private MedecinService(){

    }

    public static  void initialize(){
      Medecin medecin1=new Medecin("Coudy Ly Wane","771001010");
      medecin1.addRendezVous(new RendezVous(LocalDateTime.now().plusDays(1), new Patient("Hamat Baila Wane", "771002020", LocalDate.of(1970, 01, 15))));
      medecin1.addRendezVous(new RendezVous(LocalDateTime.now(), new Patient("Bilel Baila Wane", "771002021", LocalDate.of(1985, 02, 20))));
      Medecin medecin2=new Medecin("Hadi  Wane","771001011");

      medecins[nbreMedecin++]=medecin1;
      medecins[nbreMedecin++]=medecin2;
    }

    public static Medecin getMedecinByTel(String tel){
        for (int index = 0; index < nbreMedecin; index++) {
               if (medecins[index].getTelephone().compareTo(tel)==0) {
                  return medecins[index];
               }
        }
     return null;
    }
}
