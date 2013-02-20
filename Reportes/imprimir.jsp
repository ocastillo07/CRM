
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
    		
	if( "logusuarios".equalsIgnoreCase(reportname) )
	{
		pars.put("pidusuario", request.getParameter("idusuario"));
		pars.put("pf1", request.getParameter("f1"));
		pars.put("pf2", request.getParameter("f2"));
	}
	if( "actividades".equalsIgnoreCase(reportname) )
	{
		pars.put("idvendedor", request.getParameter("idvendedor"));
		pars.put("fecha1", request.getParameter("fecha1"));
		pars.put("fecha2", request.getParameter("fecha2"));
	}
	if( "ofertas".equalsIgnoreCase(reportname) )
	{
		int idoferta = Integer.parseInt(request.getParameter("idoferta"));
		int idrevision= Integer.parseInt(request.getParameter("idrevision"));
		
		pars.put("idoferta", idoferta);
		pars.put("idrevision", idrevision);		
	}
	if( "pedidofactura".equalsIgnoreCase(reportname) )
	{
		int idoferta = Integer.parseInt(request.getParameter("idoferta"));
		int idrevision= Integer.parseInt(request.getParameter("idrevision"));
		pars.put("idoferta", idoferta);
		pars.put("idrevision",idrevision);		
	}
	if( "presupuesto".equalsIgnoreCase(reportname) )
	{
		int idpresupuesto = Integer.parseInt(request.getParameter("idpresupuesto"));
		int idrevision= Integer.parseInt(request.getParameter("idrevision"));
		int partes= Integer.parseInt(request.getParameter("partes"));
		pars.put("idpresupuesto", idpresupuesto);
		pars.put("idrevision",idrevision);		
		pars.put("partes",partes);
	}
	
	ServletContext context = session.getServletContext();
	String relativepath = context.getRealPath(request.getContextPath()); 
	pars.put("relativepath", relativepath+"/");
		
	JasperPrint jasperPrint =JasperFillManager.fillReport(jasperReport, pars, connection);
	
	
	StringBuffer sbuffer = new StringBuffer();

	OutputStream ouputStream = response.getOutputStream();

	String reporttype = request.getParameter("tiporeporte");

	JRExporter exporter = null;
	
	
	if( "pdf".equalsIgnoreCase(reporttype) )
	{
		response.setContentType("application/pdf");
		exporter = new JRPdfExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	else if( "rtf".equalsIgnoreCase(reporttype) )
	{
		response.setContentType("application/rtf");
		response.setHeader("Content-Disposition", "inline; filename=\"file.rtf\"");

		exporter = new JRRtfExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	else if( "html".equalsIgnoreCase(reporttype) )
	{
		exporter = new JRHtmlExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	else if( "xls".equalsIgnoreCase(reporttype) )
	{
		response.setContentType("application/xls");
		response.setHeader("Content-Disposition", "inline; filename=\"file.xls\"");

		exporter = new JRXlsExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	else if( "csv".equalsIgnoreCase(reporttype) )
	{
		response.setContentType("application/csv");
		response.setHeader("Content-Disposition", "inline; filename=\"file.csv\"");

		exporter = new JRCsvExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, ouputStream);
	}
	
	exporter.exportReport();


}catch(Exception ex) {
         ex.printStackTrace();
      }
%>