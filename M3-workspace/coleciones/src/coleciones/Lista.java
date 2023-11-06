package coleciones;

public class Lista {
	/*
	 * Inner Class
	 */
	private class Node {
		public Node siguiente;
		public Object dada;
		
		public Node (Object pDada) {
			this.dada = pDada;
			this.siguiente = null;
		}
		
		/*
		public void add (Object pDada) {
			this.siguiente = new Node(pDada);
		}
		*/
	}
	
	/*
	 * Atributos
	 */
	private Node primer;
	
	/*
	 * Constructores
	 */
	public Lista () {
		this.primer = null;
	}
	
	/*
	 * Metodos
	 */
	public boolean isEmpty () {
		return this.primer == null; 
	}
	
	public void add (Object pDada) {
		if (isEmpty()) this.primer = new Node(pDada);
	}
}
