package exceptions;

import javax.swing.JOptionPane;

public class WrongShiftException extends RuntimeException {
	public WrongShiftException () {
		super();
	}
	
	public void show () {
		JOptionPane.showMessageDialog(null, this.getMessage(), this.getClass().getSimpleName(), JOptionPane.ERROR_MESSAGE);
	}
}
