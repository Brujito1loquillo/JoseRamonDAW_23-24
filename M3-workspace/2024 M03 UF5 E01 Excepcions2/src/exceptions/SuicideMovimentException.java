package exceptions;

import javax.swing.JOptionPane;

public class SuicideMovimentException extends Exception {
	public SuicideMovimentException () {
		super();
	}
	
	public void show () {
		JOptionPane.showMessageDialog(null, this.getMessage(), this.getClass().getSimpleName(), JOptionPane.ERROR_MESSAGE);
	}
}
