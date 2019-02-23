import javax.swing.*;
import java.applet.Applet;
import java.awt.*;

public class drawShape extends JApplet {
    private JPanel panel;
    /**
     * Called by the browser or applet viewer to inform
     * this applet that it has been loaded into the system. It is always
     * called before the first time that the {@code start} method is
     * called.
     * <p>
     * A subclass of {@code Applet} should override this method if
     * it has initialization to perform. For example, an applet with
     * threads would use the {@code init} method to create the
     * threads and the {@code destroy} method to kill them.
     * <p>
     * The implementation of this method provided by the
     * {@code Applet} class does nothing.
     *
     * @see Applet#destroy()
     * @see Applet#start()
     * @see Applet#stop()
     */
    @Override
    public void init() {
        super.init();
        add(new drawComponent());
        setVisible(true);
    }
}

class drawComponent extends JComponent{
    /**
     * Calls the UI delegate's paint method, if the UI delegate
     * is non-<code>null</code>.  We pass the delegate a copy of the
     * <code>Graphics</code> object to protect the rest of the
     * paint code from irrevocable changes
     * (for example, <code>Graphics.translate</code>).
     * <p>
     * If you override this in a subclass you should not make permanent
     * changes to the passed in <code>Graphics</code>. For example, you
     * should not alter the clip <code>Rectangle</code> or modify the
     * transform. If you need to do these operations you may find it
     * easier to create a new <code>Graphics</code> from the passed in
     * <code>Graphics</code> and manipulate it. Further, if you do not
     * invoker super's implementation you must honor the opaque property,
     * that is
     * if this component is opaque, you must completely fill in the background
     * in a non-opaque color. If you do not honor the opaque property you
     * will likely see visual artifacts.
     * <p>
     * The passed in <code>Graphics</code> object might
     * have a transform other than the identify transform
     * installed on it.  In this case, you might get
     * unexpected results if you cumulatively apply
     * another transform.
     *
     * @param panelGraphics the <code>Graphics</code> object to protect
     * @see #paint
     */
    @Override
    protected void paintComponent(Graphics panelGraphics) {
        super.paintComponent(panelGraphics);
        panelGraphics.setColor(Color.red);
        panelGraphics.fillRect(0,0,100,200);
        panelGraphics.setColor(Color.green);
        panelGraphics.fillOval(100,200,200,200);
    }
}