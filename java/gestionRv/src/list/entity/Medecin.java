package list.entity;

import java.time.LocalDate;
import java.util.ArrayList;

public class Medecin {

  private String nomPrenom;
  private  String telephone; 
  private ArrayList<RendezVous> rendezVous=new ArrayList<>();

public Medecin(String nomPrenom, String telephone) {
    this.nomPrenom = nomPrenom;
    this.telephone = telephone;
}

  public String getNomPrenom() {
    return nomPrenom;
  }
  public void setNomPrenom(String nomPrenom) {
    this.nomPrenom = nomPrenom;
  }
  public String getTelephone() {
    return telephone;
  }
  public void setTelephone(String telephone) {
    this.telephone = telephone;
  }
  public ArrayList<RendezVous> getRendezVous() {
    return rendezVous;
  }
  public ArrayList<RendezVous> getRendezVous(LocalDate date) {
    ArrayList<RendezVous> rendezVousByDate=new ArrayList<RendezVous>();
    for (int index = 0; index < this.rendezVous.size(); index++) {
          LocalDate dateDuRv=this.rendezVous.get(index).getDateHeure().toLocalDate();
          if (dateDuRv.isEqual(date)) {
              rendezVousByDate.add(this.rendezVous.get(index));
          }
    }
    return rendezVousByDate;
  }

   public boolean addRendezVous(RendezVous rv) {
        this.rendezVous.add(rv);
        return true;
   }

}
