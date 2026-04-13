package array;
import java.time.LocalDate;
import java.util.Scanner;

import array.entity.Medecin;
import array.entity.RendezVous;
import array.service.MedecinService;
import array.views.MedecinView;

public class App {
    private  static Scanner scanner=new Scanner(System.in);
    public static void main(String[] args) throws Exception {
       
        MedecinService.initialize();
        int choice ;
        do {
            choice=menu();
              switch (choice) {
                case 1:
                    String tel=MedecinView.saisirTelephone();
                    Medecin medecin=MedecinService.getMedecinByTel(tel);
                    if (medecin==null) {
                        System.out.println("Aucun Medecin trouve");
                        
                    }else{

                        RendezVous [] rvsUnMedecin=medecin.getRendezVous(LocalDate.now());
                        MedecinView.afficherRV(rvsUnMedecin);
                    }
                    break;
              
                default:
                    break;
              }
        } while (choice!=3);
        
    }
    public static int menu(){
        System.out.println("1-Lister les RV");
        System.out.println("2-Enregister un RV");
        System.out.println("3-Quiiter");
        return scanner.nextInt();
    }
}
