<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Faculties</title>
            </head>
            <body>
                <h3>Faculties List</h3>
                <table border = "1">
                    <tr bgcolor = "#9acd32">
                        <th>No.</th>
                        <th>Faculty code</th>
                        <th>Faculty name</th>
                    </tr>
                    <xsl:for-each select="//faculty">
                        <tr>
                            <td>
                                <xsl:number />
                            </td>
                            <td>
                                <xsl:value-of select="facultyCode" />
                            </td>
                            <td>
                                <xsl:value-of select="facultyName" />
                            </td>
                            <td>
                                <href a="compareCourses.php?id=">
                                    Delete
                                </href>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
