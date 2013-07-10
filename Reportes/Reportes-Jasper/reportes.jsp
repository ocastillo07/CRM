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
	connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/sinergia", "root", "freedom"); 
	}
	catch(Exception ex) {
         		ex.printStackTrace();
      	}			
	
	String reportname = request.getParameter("reporte");
	File reportFile = new File(application.getRealPath("sinergiarep/"+reportname+".jasper"));
			
	JasperReport jasperReport = (JasperReport)JRLoader.loadObject(reportFile.getPath());

	Map pars = new HashMap(); 
    	//pars.put("tipocuenta", "Distribution");
		
/**********************************************************************************************************************************************/		
	if( "reqrefacciones".equalsIgnoreCase(reportname) )
	{
		String cad = "";
		if (request.getParameter("estatus")!=null)
		{
			cad = " where r.idestatus = " + request.getParameter("estatus");
			if (request.getParameter("f1")!=null)
				cad = cad + " and r.fechacreacion between '" + request.getParameter("f1") + "' and '" + request.getParameter("f2") + "'";
		}
		else
		{
			if (request.getParameter("abierto")!=null)				
					cad = " where e.abierto = 1";
			else
			{
				if (request.getParameter("cerrado")!=null)		
					cad = " where e.abierto = 0";		
				else
				{			
				    if (request.getParameter("nota")!=null)
					cad = " inner join notas nn on nn.idnota=r.idnota and nn.fecha between '"+
					    request.getParameter("ff1")+"' and '"+request.getParameter("ff2")+"' where e.abierto in(0,1)";					
				    else
				    {
					if (request.getParameter("f1")!=null)
					    cad = " where r.fechacreacion between '" + request.getParameter("f1") + "' and '" + request.getParameter("f2") + "'";
					else
					{
					    if (request.getParameter("asunto")!=null)
						cad = " where r.idasunto="+request.getParameter("asunto");
					    else
						cad = "";
					}
				    }
				}
			}
		}
		//proyecto
		if(request.getParameter("idproyecto")!=null)
		{
		  if(cad!="")
		      cad = cad + " and r.idproyecto="+request.getParameter("idproyecto");
		  else
		      cad= " where r.idproyecto="+request.getParameter("idproyecto");
		}
		pars.put("pcondicion", cad);
	}
		
/**********************************************************************************************************************************************/			
	if( "reqmatserv".equalsIgnoreCase(reportname) )
	{
		String cad = "";
		if (request.getParameter("idreq")!=null)
			cad = " where r.idrequisicion = " + request.getParameter("idreq");			
		else
		{
		    if (request.getParameter("estatus")!=null)
		    {
			cad = " where r.idestatus = " + request.getParameter("estatus");
			if (request.getParameter("f1")!=null)
			    cad = cad + " and r.fechacreacion between '" + request.getParameter("f1") + "' and '" + 			request.getParameter("f2") + "'";
		    }
		    else
		    {
			if (request.getParameter("abierto")!=null)				
			    cad = " where e.abierto = 1";
			else
			{
			    if (request.getParameter("cerrado")!=null)		
				 cad = " where e.abierto = 0";		
			    else
			    {			
				if (request.getParameter("nota")!=null)
				      cad = " inner join notas nn on nn.idnota=r.idnota and nn.fecha between '"+
					request.getParameter("ff1")+"' and '"+request.getParameter("ff2")+"' where e.abierto in(0,1)";		
				else
				{
				  if (request.getParameter("f1")!=null)
				      cad = " where r.fechacreacion between '" + request.getParameter("f1") + "' and '" + request.getParameter("f2") + "'";
				  else
				  {
				    if (request.getParameter("asunto")!=null)
					cad = " where r.idasunto="+request.getParameter("asunto");
				    else
					cad = "";
				  }
				}
			    }
			}
		    } 
		}
		//proyecto
		if(request.getParameter("idproyecto")!=null)
		{
		  if(cad!="")
		      cad = cad + " and r.idproyecto="+request.getParameter("idproyecto");
		  else
		      cad= " where r.idproyecto="+request.getParameter("idproyecto");
		}
		pars.put("pcondicion", cad);
	}
		
/**********************************************************************************************************************************************/			
	if( "repref".equalsIgnoreCase(reportname) )
		{
		String cad = "";
		if (request.getParameter("idreq")!=null)
			cad = " where r.idrequisicion = " + request.getParameter("idreq");			
		else
			{
			if (request.getParameter("estatus")!=null)
				{
				cad = " where r.idestatus = " + request.getParameter("estatus");
				if (request.getParameter("f1")!=null)
					cad = cad + " and r.fechacreacion between '" + request.getParameter("f1") + "' and '" + request.getParameter("f2") + "'";
				}
			else
				{
				if (request.getParameter("f1")!=null)
					cad = " where r.fechacreacion between '" + request.getParameter("f1") + "' and '" + request.getParameter("f2") + "'";
				else
					cad = "";
				}
			}
		pars.put("pcondicion", cad);
		}
		
		
/**********************************************************************************************************************************************/			
	if( "ordtrab".equalsIgnoreCase(reportname) )
		{
		String cad = "";
		if (request.getParameter("idord")!=null)
			cad = " where r.idorden = " + request.getParameter("idord");			
		else
			{
		if (request.getParameter("estatus")!=null)
			{
			cad = " where r.idestatus = " + request.getParameter("estatus");
			if (request.getParameter("f1")!=null)
				cad = cad + " and r.fechacreacion between '" + request.getParameter("f1") + "' and '" + request.getParameter("f2") + "'";
			}
		else
			{
			if (request.getParameter("abierto")!=null)				
					cad = " where e.abierto = 1";
			else
				{
				if (request.getParameter("cerrado")!=null)		
					cad = " where e.abierto = 0";		
				else
					{			
					if (request.getParameter("nota")!=null)
						cad = " inner join notas nn on nn.idnota=r.idnota and nn.fecha between '"+
                        request.getParameter("ff1")+"' and '"+request.getParameter("ff2")+"' where e.abierto in(0,1)";					
					else
						{
						if (request.getParameter("f1")!=null)
							cad = " where r.fechacreacion between '" + request.getParameter("f1") + "' and '" + request.getParameter("f2") + "'";
						else
							{
							if (request.getParameter("asunto")!=null)
								cad = " where r.idasunto="+request.getParameter("asunto");
							else
								cad = "";
							}
						}
					}
				}
			} }
		//proyecto
		if(request.getParameter("idproyecto")!=null)
		{			
		    if(cad!="")
		      cad = cad + " and r.idproyecto="+request.getParameter("idproyecto");
		    else
		      cad= " where r.idproyecto="+request.getParameter("idproyecto");
		}
		pars.put("pcondicion", cad);
		}
		
/**************************************************************************************************************************************/		
	if( "estatusrequis".equalsIgnoreCase(reportname) )
		{
		String cad = "";	
		if (request.getParameter("f1")!= null)			
			{
			cad = " where c.fecha between '" + request.getParameter("f1") + "' and '" + request.getParameter("f2") + "' ";
			if (request.getParameter("tipo")!=null)					
				cad = cad + "and c.tipo = '" + request.getParameter("tipo") + "' ";
			if (request.getParameter("desde")!=null)					
				cad = cad + "and c.idrequisicion between '" + request.getParameter("desde") + "' and '" + request.getParameter("hasta") + "'";				
			}
		else
			{
			if (request.getParameter("tipo")!=null)	
				{				
				cad = "where c.tipo = '" + request.getParameter("tipo") + "' ";
				if (request.getParameter("desde")!=null)					
					cad = cad + "and c.idrequisicion between '" + request.getParameter("desde") + "' and '" + request.getParameter("hasta")+ "' ";
				}
			else
				{
				if (request.getParameter("desde")!=null)	
					cad = cad + "where c.idrequisicion between '" + request.getParameter("desde") + "' and '" + request.getParameter("hasta") + "' ";
				else
					cad = "";
				}
			}
		pars.put("pcondicion", cad);
		}
		

/**************************************************************************************************************************************/		
	if( "repactiv".equalsIgnoreCase(reportname) )
		{
		String cad = "";	
		if (request.getParameter("login")!= null)
            		cad = " where login='"+request.getParameter("login")+"' ";
        	else
			cad = " where a.idusuario>0 ";
            		
			
		if (request.getParameter("ab")!= null)	
            		cad = cad+" and e.abierto = "+request.getParameter("ab");

		if (request.getParameter("id")!= null)	
			cad = cad+" and idactividad= "+request.getParameter("id");

		if (request.getParameter("user")!= null)	
			cad = cad+" and concat(u.nombre,' ',u.apaterno,' ',u.amaterno) like '%"+request.getParameter("user")+"%'";
		
		if (request.getParameter("fc")!= null)		
            		cad = cad+" and fechacreacion >= '"+request.getParameter("fc")+"'";
			
        	if (request.getParameter("des")!= null)		
         		cad = cad+" and descripcion like '%"+request.getParameter("des")+"%'";
			
        	if (request.getParameter("estatus")!= null)		
         		cad = cad+" and e.nombre like '%"+request.getParameter("estatus")+"%'";
		
		pars.put("pcondicion", cad);
		}
		
/**************************************************************************************************************************************/
if( "repmatflotilla".equalsIgnoreCase(reportname) )
{
	String cad = "";	
	if (request.getParameter("f1")!= null)
	    cad = " where fechaacarreo between '"+request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
	else
	{
	  cad = " where month(fechaacarreo) = month(curdate()) ";
	}
	if(request.getParameter("idproyecto")!=null)
	{
	  if (request.getParameter("f1")!= null)
	    cad = cad + " and idproyecto="+request.getParameter("idproyecto");
	  else
	    cad = cad + " and idproyecto="+request.getParameter("idproyecto");
	}
	pars.put("pcondicion", cad);
}	
		
/**************************************************************************************************************************************/

if( "dispporequipo".equalsIgnoreCase(reportname) )
{
	String cad = "";	
	if (request.getParameter("f1")!= null)		
	{		
            cad = " where h.idproyecto= "+request.getParameter("idproyecto")+ " and fechamov between date_format('"+request.getParameter("f1")+"','%Y/%m/01') and '"+request.getParameter("f1")+"' ";		
	    if (request.getParameter("clave")!= null)	
		cad = cad + " and h.claveequipo ='"+request.getParameter("clave")+"' ";							
	}	
        else			
	  cad = "";
      if(request.getParameter("idproyecto")!=null)
      {
	if(cad!="")
	  cad = cad + " and h.idproyecto= "+request.getParameter("idproyecto");
	else
	  cad = " where h.idproyecto= "+request.getParameter("idproyecto");
      }
	
	pars.put("pcondicion", cad);
}	
				
/**************************************************************************************************************************************/

if( "horasequipo".equalsIgnoreCase(reportname) )
{
	String cad = "";	
	if (request.getParameter("f1")!= null)	
		cad = " where h.fechamov between date_format('"+request.getParameter("f1")+"','%Y/%m/01') and '"+request.getParameter("f1")+"' ";		
        else			
		cad = "";

	if(request.getParameter("idproyecto")!=null)
	{
	  if(cad!="")
	    cad = cad + " and h.idproyecto= "+request.getParameter("idproyecto");
	  else
	    cad = " where h.idproyecto= "+request.getParameter("idproyecto");
	}  
	pars.put("pcondicion", cad);
}	
		

/**************************************************************************************************************************************/

if( "horasequipo_tipoequipo".equalsIgnoreCase(reportname) )
{
	String cad = "";	
	if (request.getParameter("f1")!= null)	
	    cad = " where h.fechamov between date_format('"+request.getParameter("f1")+"','%Y/%m/01') and '"+request.getParameter("f1")+"' ";		
        else			
	    cad = "";
	if(request.getParameter("idproyecto")!=null)
	{
	  if(cad!="")
	    cad = cad + " and h.idproyecto= "+request.getParameter("idproyecto");
	  else
	    cad = " where h.idproyecto= "+request.getParameter("idproyecto");
	}
	pars.put("pcondicion", cad);
}	
		
/**************************************************************************************************************************************/

if( "repproyectos".equalsIgnoreCase(reportname) )
		{
		String cad = "";	
		pars.put("pcondicion", cad);
		}	
		
/*************************************************************************************************************************************/

if( "repequipo".equalsIgnoreCase(reportname) )
		{
		String cad = "";	
		pars.put("pcondicion", cad);
		}	
		
/**************************************************************************************************************************************/

if( "conequipmens".equalsIgnoreCase(reportname) )
{
    String cad = "";
    if (request.getParameter("f1")!= null)	
	cad = " where month(ec.fechaevaluacion) = month('"+request.getParameter("f1")+"') and year(ec.fechaevaluacion) = year('"+request.getParameter("f1")+"')";
    else			
	cad = "";	
    
    if(request.getParameter("idproyecto")!=null)
    {
	 if(cad!="")
	    cad = cad + " and ec.idproyecto= "+request.getParameter("idproyecto");
	 else
	    cad = " where ec.idproyecto= "+request.getParameter("idproyecto");
    }
    pars.put("pcondicion", cad);
}	
		
/**************************************************************************************************************************************/

if( "condequipo".equalsIgnoreCase(reportname) )
{
	String cad = "";	
	if (request.getParameter("f1")!= null)	
		cad = " where ec.fechaevaluacion ='"+request.getParameter("f1")+"'";
        else			
		cad = "";
	
	if(request.getParameter("idproyecto")!=null)
	{
	  if(cad!="")
	      cad = cad + " and ec.idproyecto= "+request.getParameter("idproyecto");
	  else
	      cad = " where ec.idproyecto= "+request.getParameter("idproyecto");
	}    
	pars.put("pcondicion", cad);
}	
/**************************************************************************************************************************************/
if( "barrenacion".equalsIgnoreCase(reportname) )
{
	/*String cad = "";	
	if (request.getParameter("f1")!= null)	
		cad = " where b.fechacreacion between '"+request.getParameter("f1")+"' and '"+request.getParameter("f2")+"'";
        else			
		cad = "";
	
	if(request.getParameter("idproyecto")!=null)
	{
	  if(cad!="")
	      cad = cad + " and b.idproyecto= "+request.getParameter("idproyecto");
	  else
	      cad = " where b.idproyecto= "+request.getParameter("idproyecto");
	}  */  
	//out.print("condicion "+request.getParameter("cond"));
	pars.put("pcondicion", request.getParameter("cond"));
}		

if( "acarreo".equalsIgnoreCase(reportname) )
{
	pars.put("pcondicion", request.getParameter("cond"));
}
	
if( "cargado".equalsIgnoreCase(reportname) )
{
	pars.put("pcondicion", request.getParameter("cond"));
}	

if( "polizasxvencer".equalsIgnoreCase(reportname) )
{
	pars.put("pcondicion", request.getParameter("cond"));
}

if( "evaluacion".equalsIgnoreCase(reportname) )
{
	String cad = "";	

	if(request.getParameter("idproyecto")!=null)
	{
      cad = " where e.anio='"+request.getParameter("ano")+"' and e.mes='"+request.getParameter("mes")+"'  and u.idproyecto= "+request.getParameter("idproyecto");
	}
	pars.put("pcondicion", cad);
}	

if( "repevaluacionres".equalsIgnoreCase(reportname) )
{
	String cad = "";	

	if(request.getParameter("idproyecto")!=null)
	{
      cad = " where e.anio='"+request.getParameter("ano")+"' and e.mes='"+request.getParameter("mes")+"'  and u.idproyecto= "+request.getParameter("idproyecto");
	}
	pars.put("pcondicion", cad);
}	

/**************************************************************************************************************************************/		
if( "3Bdiesel".equalsIgnoreCase(reportname) )
{
	/*String cad = "";	
	/*if (request.getParameter("f1")!= null)			
	{
		cad = " where c.fecha between '" + request.getParameter("f1") + "' and '" + request.getParameter("f2") + "' ";
		if (request.getParameter("tipo")!=null)					
			cad = cad + "and c.tipo = '" + request.getParameter("tipo") + "' ";
		if (request.getParameter("desde")!=null)					
			cad = cad + "and c.idrequisicion between '" + request.getParameter("desde") + "' and '" + request.getParameter("hasta") + "'";				
		}
	pars.put("pcondicion", cad);*/
}
		
		
/**************************************************************************************************************************************/		
if( "3Clubricantes".equalsIgnoreCase(reportname) )
{  
    String cad = "";
	String tsae30 =  request.getParameter("tsae30");
	pars.put("pcondicion", cad);
	pars.put("t15w40", request.getParameter("t15w40"));
	pars.put("tacehidr", request.getParameter("tacehidr"));
	pars.put("tsae30",tsae30);
	pars.put("tsae140", request.getParameter("tsae140"));
	pars.put("p15w40", request.getParameter("p15w40"));
	pars.put("pacehidr", request.getParameter("pacehidr"));
	pars.put("psae30", request.getParameter("psae30"));
	pars.put("psae140", request.getParameter("psae140"));
}
		




	
/**************************************************************************************************************************************/


	ServletContext context = session.getServletContext();
	String relativepath = context.getRealPath(request.getContextPath()); 
	pars.put("relativepath", relativepath+"/");
			
	JasperPrint jasperPrint =JasperFillManager.fillReport(jasperReport, pars, connection);
	//JasperPrint jasperPrint =JasperFillManager.fillReport(jasperReport, null, connection);
	
	StringBuffer sbuffer = new StringBuffer();

	OutputStream ouputStream = response.getOutputStream();

	String reporttype = request.getParameter("tiporeporte");
	
	//String reporttype = "pdf";

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