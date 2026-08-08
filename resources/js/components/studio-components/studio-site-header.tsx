"use client"
import { Menu } from "lucide-react"
import { SearchForm } from "@/components/search-form"
import { Link } from '@inertiajs/react';

import { SquarePlay } from 'lucide-react';

import { Button } from "@/components/ui/button"

import { panel } from '@/routes/studio';

import { useSidebar } from "@/components/ui/sidebar"
import { NavUser } from "@/components/nav-user"

export function StudioSiteHeader() {
  const { toggleSidebar } = useSidebar()
  return (
    <header className="bg-background sticky top-0 z-50 flex w-full items-center border-b">
      <div className="flex h-(--header-height) w-full items-center gap-2 px-4">
        <Button
          className="h-8 w-8"
          variant="ghost"
          size="icon"
          onClick={toggleSidebar}
        >
          <Menu  />
        </Button>
        <SquarePlay />
        <Link href={panel().url}>Studio</Link>
        <SearchForm className="mx-auto w-full sm:ml-auto sm:w-auto" />
        <div className="w-12">
        <NavUser />
        </div>
      </div>
    </header>
  )
}
