import { StudioAppSidebar } from "@/components/studio-components/studio-app-sidebar"
import { StudioSiteHeader } from "@/components/studio-components/studio-site-header"
import {
  SidebarInset,
  SidebarProvider,
} from "@/components/ui/sidebar"
import { PropsWithChildren } from "react"

export const iframeHeight = "800px"

export const description = "A sidebar with a header and a search form."


export default function StudioLayout({ children }: PropsWithChildren ) {
    return(
      <div className="[--header-height:calc(--spacing(14))]">
      <SidebarProvider className="flex flex-col">
        <StudioSiteHeader />
        <div className="flex flex-1">
          <StudioAppSidebar collapsible="icon"/>
          <SidebarInset>
            {children}
          </SidebarInset>
        </div>
      </SidebarProvider>
    </div>
    );
}