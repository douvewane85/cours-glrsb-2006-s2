package entity;

public enum Niveau {
    CI,CP,CE1,CE2,CM1,CM2;

    public static Niveau[] getAllNiveau() {
      return Niveau.values();
    }
}
