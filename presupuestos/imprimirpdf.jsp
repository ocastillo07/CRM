
<%@ page import="java.sql.*" %>
<%@ page import="net.sf.jasperreports.engine.*" %>
<%@ page import="net.sf.jasperreports.engine.util.*" %>
<%@ page import="net.sf.jasperreports.engine.export.*" %>
<%@ page import="net.sf.jasperreports.j2ee.servlets.*" %>
<%@ page import="java.util.*" %>
<%@ page import="java.io.*" %>
<%@ page import="java.util.HashMap" %>
<%@ page import="java.util.Map" %>


<%
Connection connection = null; 
try
{	
	try
	{
		Class.forName("com.mysql.jdbc.Driver").newInstance(); 
		connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/crm", "root", "freedom"); 
	}
	catch(Exception ex) {
         		ex.printStackTrace();
      	}
			
    	String reportname = request.getParameter("reporte");
	File reportFile = new File(application.getRealPath(reportname+".jasper"));
	JasperReport jasperReport = (JasperReport)JRLoader.loadObject(reportFile.getPath());
	Map pars = new HashMap();
	int idpresupuesto = Integer.parseInt(request.getParameter("idpresupuesto"));
	int idrevision= Integer.parseInt(request.getParameter("idrevision"));
	int partes= Integer.parseInt(request.getParameter("partes"));
	pars.put("idpresupuesto", idpresupuesto);
	pars.put("idrevision",idrevision);		
	pars.put("partes",partes);
	ServletContext context = session.getServletContext();
	String relativepath = context.getRealPath(request.getContextPath()); 
	pars.put("relativepath", relativepath+"/");
	JasperPrint jasperPrint =JasperFillManager.fillReport(jasperReport, pars, connection);
	
	String PdfFileSource = relativepath+"/presupuestos/presupuesto"+request.getParameter("idpresupuesto")+".pdf";

	//JasperExportManager.exportReportToPdfFile(relativepath+"/presupuesto.pdf");

	JRPdfExporter exporter = new JRPdfExporter();
	exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
	exporter.setParameter(JRExporterParameter.OUTPUT_FILE_NAME,PdfFileSource);
	exporter.exportReport();


}catch(JRException e){
	e.printStackTrace();
}catch(Exception ex) {
         ex.printStackTrace();
      }
%>
<script language="javascript" type="text/javascript">
window.close();
</script>