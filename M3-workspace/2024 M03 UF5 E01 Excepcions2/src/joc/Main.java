package joc;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
// import java.util.Scanner;

// import peces.*;
import exceptions.*;

public class Main {
	Color torn;

	public static void main(String[] args) {
		Color torn;
		
		// TODO Auto-generated method stub
		Tauler tauler = new Tauler();
		tauler.crearPartida();	
		
		tauler.imprimirTauler();
		
		System.out.println("");
		
		
		
		
		String line = "";
		String[] valors;
		Posicio posicioIniSeleccionada;
		Posicio posicioFiSeleccionada;
		
		do {
			torn = Color.BLANC;
			
			System.out.println("");
			System.out.println("Juguen BLANQUES");
			
			BufferedReader buffer=new BufferedReader(new InputStreamReader(System.in));
			
			do {
				System.out.println("Selecciona peça a moure (H,V):");
				try {
					line=buffer.readLine();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				valors = line.split(",");
				posicioIniSeleccionada = new Posicio(Integer.parseInt(valors[0]), Integer.parseInt(valors[1]));
				
				if (tauler.getPeca(posicioIniSeleccionada) == null) {
					// System.out.println("No hi ha peça en aquest escac del taulell");
					try {
						throw new IllegalMovementException("55");
					} catch (IllegalMovementException e) {
						e.show();
					}
					
					posicioIniSeleccionada = null;
				} else {
					if (tauler.getPeca(posicioIniSeleccionada).getEquip() != torn) {
						// System.out.println("No és el teu torn.... juguen BLANQUES");
						try {
							throw new WrongShiftException();
						} catch (WrongShiftException e) {
							e.show();
						}
						
						posicioIniSeleccionada = null;
					} else {
						if (!tauler.getPeca(posicioIniSeleccionada).hihaMovimentsPosibles(tauler)) {
							// System.out.println("Amb aquesta peça no hi ha moviments possibles, escull una altre");
							try {
								throw new IllegalMovementException("75");
							} catch (IllegalMovementException e) {
								e.show();
							}
							
							posicioIniSeleccionada = null;
						} else {
							System.out.println("La peça que vols moure és: " + tauler.getPeca(posicioIniSeleccionada).toString());
					
						}
					}
				}		
			} while (posicioIniSeleccionada == null);
			
			
			do {
				System.out.println("A quina posició vols moure-la (H,V):");
				try {
					line=buffer.readLine();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				valors = line.split(",");
				posicioFiSeleccionada = new Posicio(Integer.parseInt(valors[0]), Integer.parseInt(valors[1]));
			
				if (!tauler.getPeca(posicioIniSeleccionada).movimentsPosibles(tauler)[posicioFiSeleccionada.getX()][posicioFiSeleccionada.getY()] ) {
					// System.out.println("posicio incorrecte");
					try {
						throw new IllegalMovementException("104");
					} catch (IllegalMovementException e) {
						e.show();
					}
					
					posicioFiSeleccionada = null;
				} else {
					System.out.println("ok");
				}
			} while (posicioFiSeleccionada == null);
			
			
			tauler.mouPeca(posicioIniSeleccionada, posicioFiSeleccionada);
			
			tauler.imprimirTauler();
			
			/*************************************************************************************/
			System.out.println("");
			System.out.println("Juguen NEGRES");
			torn = Color.NEGRE;
			
			do {
				System.out.println("Selecciona peça a moure (H,V):");
				try {
					line=buffer.readLine();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				valors = line.split(",");
				posicioIniSeleccionada = new Posicio(Integer.parseInt(valors[0]), Integer.parseInt(valors[1]));
				
				if (tauler.getPeca(posicioIniSeleccionada) == null) {
					// System.out.println("No hi ha peça en aquest escac del taulell");
					try {
						throw new IllegalMovementException("139");
					} catch (IllegalMovementException e) {
						e.show();
					}
					
					posicioIniSeleccionada = null;
				} else {
					if (tauler.getPeca(posicioIniSeleccionada).getEquip() != torn) {
						// System.out.println("No és el teu torn.... juguen NEGRES");
						try {
							throw new WrongShiftException();
						} catch (WrongShiftException e) {
							e.show();
						}
						posicioIniSeleccionada = null;
					} else {
						if (!tauler.getPeca(posicioIniSeleccionada).hihaMovimentsPosibles(tauler)) {
							// System.out.println("Amb aquesta peça no hi ha moviments possibles, escull una altre");
							try {
								throw new IllegalMovementException("158");
							} catch (IllegalMovementException e) {
								e.show();
							}
							
							posicioIniSeleccionada = null;
						} else {
							System.out.println("La peça que vols moure és: " + tauler.getPeca(posicioIniSeleccionada).toString());
					
						}
					}
				}	
			} while (posicioIniSeleccionada == null);
			
			
			do {
				System.out.println("A quina posició vols moure-la (H,V):");
				try {
					line=buffer.readLine();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				valors = line.split(",");
				posicioFiSeleccionada = new Posicio(Integer.parseInt(valors[0]), Integer.parseInt(valors[1]));
			
				if (!tauler.getPeca(posicioIniSeleccionada).movimentsPosibles(tauler)[posicioFiSeleccionada.getX()][posicioFiSeleccionada.getY()] ) {
					// System.out.println("posicio incorrecte");
					try {
						throw new IllegalMovementException("187");
					} catch (IllegalMovementException e) {
						e.show();
					}
					
					posicioFiSeleccionada = null;
				} else {
					System.out.println("ok");
				}
			} while (posicioFiSeleccionada == null);
			
			
			tauler.mouPeca(posicioIniSeleccionada, posicioFiSeleccionada);
			
			tauler.imprimirTauler();
		
		} while (true);
		
	}

}
