package exceptions;

import javax.swing.JOptionPane;

public class IllegalMovementException extends Exception {
	private String codi;
	
	public IllegalMovementException (String pCodi) {
		this(pCodi, "Has realitzat un moviment incorrecte.");
	}
	
	public IllegalMovementException (String pCodi, String pMissatge) {
		super(pMissatge);
		
		codi = pCodi;
	}
	
	public void show () {
		// JOptionPane.showMessageDialog(null, this.getMessage(), this.getClass().toString(), JOptionPane.ERROR_MESSAGE);
		JOptionPane.showMessageDialog(null, this.getMessage(), this.getClass().getSimpleName(), JOptionPane.ERROR_MESSAGE);
	}
}
