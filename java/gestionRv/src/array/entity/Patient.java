package array.entity;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;

public class Patient {
   private String nomPrenom;
   private  String telephone;
   private final int N=3;
   //LocaDate 
   private LocalDate dateNaiss; 
   private Antecedent[] antecedents=new Antecedent[N] ;
   private int nbreAntecent;

   public Patient(String nomPrenom, String telephone, LocalDate dateNaiss) {
    this.nomPrenom = nomPrenom;
    this.telephone = telephone;
    this.dateNaiss = dateNaiss;
  }
   public String getNomPrenom() {
    return nomPrenom;
   }
   public String getTelephone() {
    return telephone;
   }
   public LocalDate getDateNaiss() {
    return dateNaiss;
   }
   public Antecedent[] getAntecedents() {
    return antecedents;
   }
   public int getNbreAntecent() {
    return nbreAntecent;
   }
   public void setNomPrenom(String nomPrenom) {
    this.nomPrenom = nomPrenom;
   }
   public void setTelephone(String telephone) {
    this.telephone = telephone;
   }
   //TODO:Date de Naissance non Modifiable
   public void setDateNaiss(LocalDate dateNaiss) {
    this.dateNaiss = dateNaiss;
   }
   public boolean addAntecedent(Antecedent antecedent) {
    if(this.nbreAntecent<N){
        this.antecedents[this.nbreAntecent++]=antecedent;
        return true;
    }
       return false;
   }
   public void setNbreAntecent(int nbreAntecent) {
    this.nbreAntecent = nbreAntecent;
   }
   @Override
   public String toString() {
    DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
    String formatted = dateNaiss.format(formatter);

    return "Patient [nomPrenom=" + nomPrenom + ", telephone=" + telephone + ", dateNaiss=" + formatted + "]";
   }

   

}
