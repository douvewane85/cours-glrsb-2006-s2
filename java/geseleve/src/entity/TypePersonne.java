package entity;

public enum TypePersonne {
    ELEVE, ENSEIGNANT;
    public static TypePersonne[] getAllTypePersonne() {
        return TypePersonne.values();
    }
}
