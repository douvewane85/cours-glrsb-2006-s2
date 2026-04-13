package list;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.Scanner;

import list.entity.Patient;
import list.entity.Medecin;
import list.entity.RendezVous;
import list.service.MedecinService;
import list.service.PatientService;
import list.service.RendezVousService;
import list.views.MedecinView;

public class App {
    private  static Scanner scanner=new Scanner(System.in);
    public static void main(String[] args) throws Exception {
       
       MedecinService.initialize();
        int choice ;
        do {
            choice=menu();
              switch (choice) {
                case 1:
                    Medecin medecin=rechercherMedecin();
                    if (medecin!=null) {
                       ArrayList<RendezVous>  rvsUnMedecin=medecin.getRendezVous(LocalDate.now());
                        MedecinView.afficherRV(rvsUnMedecin);
                    }
                    break;

                 case 3:
                     medecin=rechercherMedecin();
                    if (medecin!=null) {
                        ArrayList<RendezVous>  rvsUnMedecin=medecin.getRendezVous();
                        MedecinView.afficherRV(rvsUnMedecin);
                    }
                    break;
              case 2:
                     medecin=rechercherMedecin();
                     if (medecin!=null) {
                         String telPatient=MedecinView.saisirTelephone("Entrer le Telephone du Patient");
                         Patient patient=PatientService.getPatientByTel(telPatient);
                           if (patient==null) {
                              patient=MedecinView.saisirPatient(telPatient);
                              PatientService.addPatient(patient);
                              System.out.println("Patient enregistre avec succes");
                           }
                            RendezVous rv=MedecinView.saisieRendezVous();
                            rv.setPatient(patient);
                             medecin.addRendezVous(rv);
                             rv.setMedecin(medecin);
                             RendezVousService.addRendezVous(rv);
                             System.out.println("RendezVous enregistre avec succes");
                     }
                break;
                default:
                    break;
              }
        } while (choice!=4);
        
    }
    public static int menu(){
        System.out.println("1-Lister les RV");
        System.out.println("2-Enregister un RV");
         System.out.println("3-Lister  tous les  RV");
        System.out.println("4-Quitter");
        return scanner.nextInt();
    }

    public static Medecin rechercherMedecin(){
        String tel=MedecinView.saisirTelephone("Entrer le Telephone du Medecin");
        Medecin medecin=MedecinService.getMedecinByTel(tel);
        if (medecin==null) {
            System.out.println("Aucun Medecin trouve");
        }   
        return medecin;
        
    }
}
